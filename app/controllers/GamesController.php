<?php
class GamesController extends BaseController
{
    public function index()
    {
        //show listing of games
        $games = Game::all();
        return View::make('index', compact('games'));
    }

    public function create()
    {
        //Show the create game form.
        return View::make('create');
    }

    public function handleCreate()
    {
       //Handle create form submission
        $game = new Game;
        $game->title = Input::get('title');
        $game->publisher = Input::get('publisher');
        $game->complete = Input::has('complete');
        $game->save();

        return Redirect::action('GamesController@index');
    }

    public function edit( Game $game)
    {
        //Show the create game form.
        return View::make('edit', compact('game'));
    }

    public function handleEdit()
    {
        $game = Game::findOrFail(Input::get('id'));
        $game->title = Input::get('title');
        $game->publisher = Input::get('publisher');
        $game->complete = Input::has('complete');
        $game->save();

        return Redirect::action('GamesController@index');
    }

    public function delete(Game $game)
    {
        //Show the create game form.
        return View::make('delete');
    }

    public function handleDelete()
    {
        $id = Input::get('game');
        $game = Game::findOrFail($id);
        $game->delete();
        return Redirect::action('GamesController@index');
    }
}
