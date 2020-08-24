@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chat Apps</h3>
                </div>
                <div class="card-body" ref="scrollParrent">
                    <chat-messages :messages="messages"></chat-messages>

                </div>
                <div class="card-footer">
                    <chat-form v-on:sent="addMessage" :user="{{ Auth::user() }}">
                    </chat-form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
