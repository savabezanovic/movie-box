@extends("layouts.app")
@section("content")

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1>This is the data from one project</h1>

            <p>{{$project->name}}</p>

            <a href="/project/edit/{{$project->slug}}">Edit Project</a>

            <a href="/project/{{$project->slug}}/urls">Show URLs</a>

            <form action="{{action('UserController@sendInvitation', $project->id)}}" method="POST">

                @method("POST")

                @csrf

                <p>Invite To Project</p>

                <input name="email" type="email">

                <input type="submit" value="Invite">

            </form>

            <form action="{{action('ProjectController@delete', $project->slug)}}" method="POST">

                @method("DELETE")

                @csrf

                <input type="submit" value="Delete Project">

            </form>

            <a href="/project/{{$project->slug}}/notifications">Project Notification Settings</a>

            @if(!isset($link))

            <form action="{{action('ProjectController@makePublicLink', $project->slug)}}" method="GET">

                @method("GET")

                @csrf

                <input type="submit" value="Make Public Link">

            </form>

            @else

                <p>{{$link}}</p>

                <p>Copy Public Link</p>

            @endif

        </div>
    </div>
</div>

@endsection