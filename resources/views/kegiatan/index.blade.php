@extends('layouts.backend')

@push('css-external')
   {{-- full Calendar --}}
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

   <style>
    .button-hapus{
      position: absolute;
      bottom: 85px;
      left: 100px;
    }
   </style>

@endpush

@section('bg-color')
    background-color:#FF8C00;
@endsection

@section('breadcrumbs')
    Pemeran
@endsection

@section('title')
    Kegiatan | {{ config('app.name') }}
@endsection

@section('title-page')
    Kegiatan
@endsection

@section('content-header')
<center><h2 class="text-light">Form Pemeran</h2></center>
@can('kegiatan_create')
<a href="{{ route('kegiatan.create') }}" class="btn float-end mt-7" style="background-color:#5e72e4; color:white">Tambah Data</a>
<div class="card-body px-0 pt-0 pb-2">
  <div id='calendar' class="mt-10"></div>
</div>
@endcan

  <!-- Modal -->
<div class="modal fade" id="detailKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kegiatan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="dataKegiatan"></div>

        <form action="{{ route('kegiatan.ubah') }}" method="POST">
          @csrf
          <input type="hidden" name="id_kegiatan" id="id_kegiatan">

          <div class="form-group">
            <label for="nama">Nama Kegiatana</label>
            <input class="form-control" type="text" name="nama" id="nama">
          </div>
  
          <div class="form-group">
            <label for="nama">Tanggal Mulai</label>
            <input class="form-control" type="datetime-local" name="tgl_mulai" id="tgl_mulai">
          </div>
  
          <div class="form-group">
            <label for="nama">Tanggal Selesai</label>
            <input class="form-control" type="datetime-local" name="tgl_selesai" id="tgl_selesai">
          </div>
  
          <div class="form-group">
            <label for="nama">Penceramah</label>
            <select class="form-control" name="penceramah" id="penceramah">
              @foreach ($lacon as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group">
            <label  for="nama">Pengurus</label>
            <select class="form-control" name="pengurus" id="pengurus">
              @foreach ($pengurus as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group">
            <label for="nama">Jenis Kegiatan</label>
            <select class="form-control" name="jeniskegiatan" id="jeniskegiatan">
              @foreach ($jeniskegiatan as $item)
                  <option value="{{ $item->id }}">{{ $item->jenis_kegiatan }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group">
            <label for="nama">Imam</label>
            <select class="form-control" name="imam" id="imam">
              @foreach ($lacon as $item)
                  <option value="{{ $item->id }}">{{ $item->nama }}</option>
              @endforeach
            </select>
          </div>
  
          <div class="form-group">
            <label for="nama">Keterangan</label>
            <textarea class="form-control" name="keterangan" id="keterangan" cols="30" rows="10"></textarea>
          </div>

          <button type="submit" class="btn btn-primary">Simpan</button>

        </form>

        <form action="{{ route('kegiatan.delete') }}" method="POST">
          @csrf
          <input type="hidden" name="id_kegiatan" id="id_kegiatan_hapus">
          <button type="submit" class="btn btn-danger button-hapus">Hapus</button>
        </form>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
      
    </div>
  </div>
</div>

@endsection

@push('javascript-external')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript">



  $(document).ready(function () {



      /*------------------------------------------

      --------------------------------------------

      Get Site URL

      --------------------------------------------

      --------------------------------------------*/

      var SITEURL = "{{ url('/') }}";



      /*------------------------------------------

      --------------------------------------------

      CSRF Token Setup

      --------------------------------------------

      --------------------------------------------*/

      $.ajaxSetup({

          headers: {

          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

          }

      });



      /*------------------------------------------

      --------------------------------------------

      FullCalender JS Code

      --------------------------------------------

      --------------------------------------------*/

      // var start_date = $('#calendar').fullCalendar('getView').start;

      var calendar = $('#calendar').fullCalendar({

                      editable: true,

                      events: function(start, end, timezone, callback) {

                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");

                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");


                        $.ajax({
                            url: '/dashboard/kegiatan',
                            dataType: 'json',
                            data: {
                              // If you have some data to send to loadCalendarEvents.php
                                start: start,
                                end:  end
                            },
                            success: function(data) {

                                  console.log(data);

                                  var events = [];

                                  for (var i=0; i<data.length; i++){
                                      events.push({
                                            id:data[i]['id'],
                                            title: data[i]['nama'],
                                            start: data[i]['tgl_mulai'],
                                            end: data[i]['tgl_selesai'],
                                      });
                                  }

                                  //adding the callback
                                  callback(events);
                              }
                          });
                      },

                      displayEventTime: false,

                      editable: true,

                      eventRender: function (event, element, view) {

                          if (event.allDay === 'true') {

                                  event.allDay = true;

                          } else {

                                  event.allDay = false;
                            
                          }

                      },

                      selectable: true,

                      selectHelper: true,

                      eventDrop: function (event, delta) {

                          var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");

                          var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");



                          $.ajax({

                              url: SITEURL + '/dashboard/kegiatan_ajax',

                              data: {

                                  nama: event.nama,

                                  tgl_mulai: tgl_mulai,

                                  tgl_selesai: tgl_selesai,

                                  id: event.id,

                                  type: 'update'

                              },

                              type: "POST",

                              success: function (response) {

                                  displayMessage("Event Updated Successfully");

                              }

                          });

                      },

                      eventClick: function (event) {

                          // var deleteMsg = confirm("Do you really want to delete?");

                              $.ajax({

                                  type: "GET",

                                  url: SITEURL + '/dashboard/single_kegiatan',

                                  data: {
                                      id: event.id,
                                  },

                                  success: function (response) {

                                    console.log(response);

                                    $('#detailKegiatan').modal('show')

                                    $('#nama').val(response.nama);
                                    $('#tgl_mulai').val(response.tgl_mulai);
                                    $('#tgl_selesai').val(response.tgl_selesai);
                                    $('#penceramah').val(response.id_lacon).change();
                                    $('#imam').val(response.id_lacon).change();
                                    $('#pengurus').val(response.id_pengurus).change();
                                    $('#jenis_kegiatan').val(response.jenis_kegiatan).change();
                                    $('#keterangan').val(response.keterangan);

                                    //id_kegiatan
                                    $('#id_kegiatan').val(response.id);
                                    $('#id_kegiatan_hapus').val(response.id);
                                  

                                  }

                              });



                      }



                  });



      });



      /*------------------------------------------

      --------------------------------------------

      Toastr Success Code

      --------------------------------------------

      --------------------------------------------*/

      function displayMessage(message) {

          toastr.success(message, 'Event');

      }



  </script>
@endpush
