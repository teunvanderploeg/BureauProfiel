<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Question;
use App\Models\Respondent;
use App\Filament\Pages\Search;
use Livewire\Livewire;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_dashboard_requires_login(): void
    {
        $this->get('/dashboard')->assertRedirect('/dashboard/login');
        $this->get('/dashboard/login')->assertOk();
    }

    public function test_administrator_can_open_dashboard_resources_and_forms(): void
    {
        $this->actingAs(User::factory()->create());
        $this->get('/dashboard')->assertOk();
        $this->get('/dashboard/search')->assertOk();

        foreach (['answers', 'clients', 'questions', 'respondents', 'running-assignments', 'texts', 'users'] as $resource) {
            $this->get('/dashboard/'.$resource)->assertOk();
            $this->get('/dashboard/'.$resource.'/create')->assertOk();
        }

        $question = Question::factory()->create();
        $respondent = Respondent::factory()->create();
        $this->get('/dashboard/questions/'.$question->id.'/edit')->assertOk();
        $this->get('/dashboard/respondents/'.$respondent->id.'/edit')->assertOk();
    }

    public function test_search_returns_only_accepted_respondents(): void
    {
        $this->actingAs(User::factory()->create());
        Respondent::factory()->create(['accepted' => true]);
        Respondent::factory()->create(['accepted' => false]);

        Livewire::test(Search::class)
            ->call('search', [])
            ->assertSet('respondentsCount', 1)
            ->assertSet('searchPage', false);
    }

    public function test_sanctum_token_can_have_an_expiration(): void
    {
        $user = User::factory()->create();
        $token = $user->createToken('test', ['*'], now()->addHour());
        $this->withToken($token->plainTextToken)->getJson('/api/user')->assertOk();
        $token->accessToken->update(['expires_at' => now()->subMinute()]);
        $this->app['auth']->forgetGuards();
        $this->withToken($token->plainTextToken)->getJson('/api/user')->assertUnauthorized();
    }
}
