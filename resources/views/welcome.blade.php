@extends('layouts.admin')


@section('content')
 <!-- main header @e -->
                <!-- content @s -->
                <div class="nk-content ">
                    <div class="container-fluid">
                        <div class="nk-content-inner">
                            <div class="nk-content-body">
                                <div class="nk-block-head nk-block-head-sm">
                                    <div class="nk-block-between">
                                        <div class="nk-block-head-content">
                                            <h3 class="nk-block-title page-title">Logos</h3>
                                            <div class="nk-block-des text-soft">

                                            </div>
                                        </div><!-- .nk-block-head-content -->
                                        <div class="nk-block-head-content">
                                            <div class="toggle-wrap nk-block-tools-toggle">
                                                <a href="#" class="btn btn-icon btn-trigger toggle-expand mr-n1" data-target="pageMenu"><em class="icon ni ni-menu-alt-r"></em></a>
                                                <div class="toggle-expand-content" data-content="pageMenu">
                                                    <ul class="nk-block-tools g-3">
                                                        @can('role-create') <li><a href="" class="btn btn-white btn-outline-light"><em class="icon ni ni-download-cloud"></em><span>Create New Role</span></a></li> @endcan

                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForm">Add New Logo</button>

                                                    </ul>
                                                </div>
                                            </div><!-- .toggle-wrap -->
                                        </div><!-- .nk-block-head-content -->
                                    </div><!-- .nk-block-between -->
                                </div><!-- .nk-block-head -->
                                <div class="nk-block">
                                   <div class="card card-preview">
                                            <div class="card-inner">
                                                @if ($message = Session::get('success'))
                                                    <div class="alert alert-success">
                                                        <p>{{ $message }}</p>
                                                    </div>
                                                @endif

                                                <table class="datatable-init nk-tb-list nk-tb-ulist table-bordered" data-auto-responsive="false">
                                                    <thead>
                                                        <tr class="nk-tb-item nk-tb-head">
                                                            <th class="nk-tb-col nk-tb-col-check">
                                                                <div class="custom-control custom-control-sm custom-checkbox notext">

                                                                    <label class="custom-control-label" for="uid"></label>
                                                                </div>
                                                            </th>
                                                            <th class="nk-tb-col"><span class="sub-text">Name</span></th>
                                                            <th class="nk-tb-col"><span class="sub-text">URL</span></th>
                                                            <th class="nk-tb-col tb-col-mb"><span class="sub-text">Action</span></th>


                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($logos as  $logo)
                                                        <tr class="nk-tb-item">
                                                            <td class="nk-tb-col nk-tb-col-check">
                                                                {{ $loop->iteration }}
                                                            </td>
                                                             <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        {{ $logo->symbol }}
                                                                    </div>
                                                                </div>
                                                            </td>


                                                            <td class="nk-tb-col">
                                                                <div class="user-card">

                                                                    <div class="user-info">
                                                                        {{ $logo->url }}
                                                                    </div>
                                                                </div>
                                                            </td>

                                                            <td class="nk-tb-col tb-col-mb" data-order="580.00">
                                                                <a class="btn btn-info" href="" data-toggle="modal" data-target="#showModal-{{ $logo->id}}">Show</a>


                                                                    <a class="btn btn-primary" href="" data-toggle="modal" data-target="#editModal-{{ $logo->id}}">Edit</a>



                                                                    {{-- {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $logo->id],'style'=>'display:inline']) !!}
                                                                    <a class="btn btn-danger" href="" data-toggle="modal" data-target="#deleteModal-{{ $logo->id}}">Delete</a>
                                                                         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}  --}}

                                                            </td>


                                                        </tr><!-- .nk-tb-item  -->
                                                        @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div><!-- .card-preview -->
                                </div><!-- .nk-block -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- content @e -->




                 <!-- ADD Modal Form -->
    <div class="modal fade" tabindex="-1" id="modalForm">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Upload Logo</h5>
                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                        <em class="icon ni ni-cross"></em>
                    </a>
                </div>
                <div class="modal-body">
                    <form  method="POST" action=" {{ route('addlogo')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="form-label" for="full-name">Symbol</label>
                            <div class="form-control-wrap">
                                <input name="symbol" type="text" class="form-control" id="full-name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="default-06">Logo</label>
                            <div class="form-control-wrap">
                                <div class="custom-file">
                                    <input type="file" name="url"  class="custom-file-input" id="customFile">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer bg-light">
                    <span class="sub-text"></span>
                </div>
            </div>
        </div>
    </div>




    <!-- SHOW Modal Form -->
    {{-- <div class="modal fade" tabindex="-1" id="showModal-{{ $role->id}}">
       <div class="modal-dialog" role="document">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title">{{$role->name}}</h5>
                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                       <em class="icon ni ni-cross"></em>
                   </a>
               </div>
               <div class="modal-body">

                       <div class="form-group">
                           <label class="form-label" for="full-name">Name</label>
                           <div class="form-control-wrap">
                               <input name="name" readonly value="{{$role->name}}" type="text" class="form-control" id="full-name" required>
                           </div>
                       </div>

                       <div class="form-group">
                           <label class="form-label">Permission: </label>
                           <ul class="custom-control-group g-3 align-center">
                               <li>



                               </li>

                           </ul>
                       </div>

               </div>
               <div class="modal-footer bg-light">
                   <span class="sub-text"></span>
               </div>
           </div>
       </div>
   </div> --}}






                     <!-- EDIT Modal Form -->
                     {{-- <div class="modal fade" tabindex="-1" id="editModal-{{ $role->id}}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Edit {{$role->name}}</h5>
                                    <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                        <em class="icon ni ni-cross"></em>
                                    </a>
                                </div>
                                <div class="modal-body">
                                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Name</label>
                                            <div class="form-control-wrap">
                                                <input name="name" value="{{$role->name}}" type="text" class="form-control" id="full-name" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-label">Permission: </label>
                                            <ul class="custom-control-group g-3 align-center">
                                                <li>

                                                     <?php
                                                         $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                                                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                                                        ->all();

                                                        ?>


                                                    @foreach($permission as $value)
                                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                                    {{ $value->name }}</label>
                                                <br/>
                                                @endforeach

                                                </li>

                                            </ul>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Save </button>
                                        </div>
                                        {!! Form::close() !!}
                                </div>
                                <div class="modal-footer bg-light">
                                    <span class="sub-text"></span>
                                </div>
                            </div>
                        </div>
                    </div> --}}






                    <!-- DELETE Modal Form -->
                    {{-- <div class="modal fade" tabindex="-1" id="deleteModal-{{ $role->id}}">
                       <div class="modal-dialog" role="document">
                           <div class="modal-content">
                               <div class="modal-header">

                                   <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                                       <em class="icon ni ni-cross"></em>
                                   </a>
                               </div>
                               <div class="modal-body modal-body-lg text-center">
                                <div class="nk-modal">
                                    <em class="nk-modal-icon icon icon-circle icon-circle-xxl ni ni-cross-circle bg-danger"></em>
                                    <h4 class="nk-modal-title">You are about to delete {{ $role->name}} Role?</h4>
                                    <div class="nk-modal-text">
                                        <div class="caption-text">You can't undo this action.</div>

                                    </div>
                                    <div class="nk-modal-action">


                                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                                            <button type="submit" class="btn btn-lg btn-mw btn-primary">Delete</button>
                                            {!! Form::close() !!}
                                    </div>

                                </div>
                            </div><!-- .modal-body -->

                           </div>
                       </div>
                   </div> --}}





@endsection
