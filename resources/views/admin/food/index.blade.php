@extends('layouts.admin-master')

@section('title')
Dashboard
@endsection

@section('content')
{{-- <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="mb-10">
            <a href="{{ route('food.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                + Create Food
            </a>
        </div>
        <div class="bg-white">
            <table class="table-auto w-full">
                <thead>
                <tr>
                    <th class="border px-6 py-4">ID</th>
                    <th class="border px-6 py-4">Name</th>
                    <th class="border px-6 py-4">Price</th>
                    <th class="border px-6 py-4">Rate</th>
                    <th class="border px-6 py-4">Types</th>
                    <th class="border px-6 py-4">Action</th>
                </tr>
                </thead>
                <tbody>
                    @forelse($food as $item)
                        <tr>
                            <td class="border px-6 py-4">{{ $item->id }}</td>
                            <td class="border px-6 py-4 ">{{ $item->name }}</td>
                            <td class="border px-6 py-4">{{ number_format($item->price) }}</td>
                            <td class="border px-6 py-4">{{ $item->rate }}</td>
                            <td class="border px-6 py-4">{{ $item->types }}</td>
                            <td class="border px-6 py- text-center">
                                <a href="{{ route('food.edit', $item->id) }}" class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 mx-2 rounded">
                                    Edit
                                </a>
                                <form action="{{ route('food.destroy', $item->id) }}" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                           <td colspan="6" class="border text-center p-5">
                               Data Tidak Ditemukan
                           </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="text-center mt-5">
            {{ $food->links() }}
        </div>
    </div>
</div> --}}
<section class="section">
    <div class="section-header">
         <div class="mb-10">
         <div class="card-header-action">
            <h4>Manage Food</h4>
         </div>
        </div>

    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  {{-- <h4>Food</h4> --}}
                  <a href="{{ url('food/create') }}" class="btn btn-icon icon-left btn-primary">
                    <i class="fa fa-plus">
                    Create
                </i>
            </a>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                      <thead>
                        <tr>
                          <th>ID</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Rate</th>
                            <th>Types</th>
                            <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        {{-- <tr>
                          <td>
                            1
                          </td>
                          <td>Create a mobile app</td>
                          <td class="align-middle">
                            <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                              <div class="progress-bar bg-success" data-width="100%"></div>
                            </div>
                          </td>
                          <td>
                            <img alt="image" src="../assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                          </td>
                          <td>2018-01-20</td>
                          <td><div class="badge badge-success">Completed</div></td>
                          <td><a href="#" class="btn btn-secondary">Detail</a></td>
                        </tr> --}}
                        @forelse($food as $item)
                        <tr>
                            <td class="align-middle">{{ $item->id }}</td>
                            <td class="align-middle ">{{ $item->name }}</td>
                            <td class="align-middle">{{ number_format($item->price) }}</td>
                            <td class="align-middle">{{ $item->rate }}</td>
                            <td class="align-middle">{{ $item->types }}</td>
                            <td class="align-middle">
                                {{-- <a href="{{ route('food.edit', $item->id) }}"class="btn btn-icon icon-left btn-primary"><i class="far fa-edit"></i>Edit</a>
                                <form action="{{ route('food.destroy', $item->id) }}" method="POST" class="inline-block">
                                    {!! method_field('delete') . csrf_field() !!}
                                    <button type="submit" class="btn btn-icon icon-left btn-danger">
                                        Delete
                                    </button>
                                </form> --}}
                            </td>
                        </tr>
                    @empty
                        <tr>
                           <td colspan="8" class="border text-center p-5">
                               Data Tidak Ditemukan
                           </td>
                        </tr>
                    @endforelse


                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </div>
  </section>
@endsection

