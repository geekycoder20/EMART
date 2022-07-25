@extends('layouts.admin_layout')
@section('content')
<div class="content-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Contacts</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table header-border table-responsive-sm">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="contact_body">
                                    @foreach($contacts as $contact)
                                    <tr>
                                        <td><a href="javascript:void(0)">{{$contact->name}}</a>
                                        </td>
                                        <td>{{$contact->email}}</td>
                                        <td>{{$contact->message}}</td>
                                        @if ($contact->status==1)
                                        <td class="contact-switch" edit-id="{{$contact->id}}"><input type="checkbox" data-toggle="switchbutton" checked data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @else
                                        <td class="contact-switch" edit-id="{{$contact->id}}"><input type="checkbox" data-toggle="switchbutton" data-onlabel="Active" data-offlabel="InActive" data-width="100" data-size="xs">
                                        </td>
                                        @endif
                                        
                                        <td><button del-id="{{$contact->id}}"  class="btn btn-danger btn-sm delete_contact_btn">Delete</button>
                                        </td>
                                    </tr>
                                    @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{$contacts->links()}}
                </div>
            </div>
            
        </div>
    </div>
</div>






@endsection