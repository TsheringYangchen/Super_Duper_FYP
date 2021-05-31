
    @extends('front.layouts.master3')

    @section('content')
 
      <style type="text/css">
      .wrapper{
          margin: 0 auto;
          width: 75%;
          margin-top: 30px;
      }
      </style>
    
        <div class="wrapper">
            <section class="panel panel-primary">
                <div class="panel-heading text-center">
                    <h3 >Download Annual Reports</h3>
                </div><br>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead style="background-color: skyblue">
                            <th>Title</th>
                            <th>Date of Uploads</th>
                            <th>Download Reports</th>
                        </thead>
    
                        <tbody>
    
                        @foreach($downloads as $down)
                            <tr>
                                <td>{{ $down->title }}</td>
                                
                                <td>{{$down->created_at}}</td>
                                <td>
                                    <a download="{{$down->title}}">
                                    <a href="docs/{{$down->file_url}}">{{$down->file_url}}</a></td>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    @endsection
    