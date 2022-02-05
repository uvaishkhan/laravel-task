@extends('layouts.default')

@section('title',"Add Event")

@section('content')
<section class="text-center pt-3 pb-5">
    <h2>Add Event</h2>
</section>
@if($errors->any())
@foreach($errors->all() as $k=>$v)
{{$k}}
{{$v}}
@endforeach
@endif
<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <form action="{{ route('store') }}" method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="name">Event Name</label>
                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Eevent Name" required />
                                <div class="invalid-feedback">
                                    Please provide a valid name.
                                </div>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Start Date</label>
                                <input type="date" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="{{ old('start_date') }}" placeholder="Start Date" required />
                                <div class="invalid-feedback">
                                    Please provide a valid Start Date.
                                </div>
                                @error('start_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">End Date</label>
                                <input type="date" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="{{ old('end_date') }}" placeholder="End Date" required />
                                <div class="invalid-feedback">
                                    Please provide a valid End Date.
                                </div>
                                @error('end_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="organizer">Organizer</label>
                                <input type="text" class="form-control @error('organizer') is-invalid @enderror" name="organizer" value="{{ old('organizer') }}" placeholder="Organizer" required />
                                <div class="invalid-feedback">
                                    Please provide an organizer.
                                </div>
                                @error('organizer')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Description" rows="4" cols="50" required></textarea>
                                <div class="invalid-feedback">
                                    Please enter a message in the textarea.
                                </div>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12 mt-4">
                            <div class="container">
                                <h4>Tickets</h4>
                                <button id="add_new_ticket" class="btn btn-primary add_new_ticket" type="button">Add new ticket</button>
                                <table class="table ticket_table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Ticket No</th>
                                            <th>Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody class="ticket_body">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="w-100">
                            
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group p-4 text-center">
                                <input type="submit" name="submit" value="Save Event" class="btn btn-success w-25">
                            </div>
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</section>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
<script type="text/javascript">
    $(function() {
        $(document).on('click', '.delete', function(e) {
            $(this).parent().parent().remove();

        });
        $(document).on('click', '.edit', function(e) {
            $(this).prev().removeClass('d-none')
            $(this).hide();
            const obj = $(this).parent().parent();
            obj.find('.ticket_td').find('input').removeClass('d-none')
            obj.find('.ticket_td').find('span').addClass('d-none')
            console.log(obj);
            
        });
         $(document).on('click', '.save-inline', function(e) {
            $(this).next().show()
            $(this).hide();
            const obj = $(this).parent().parent();
           const ticketName=  obj.find('.ticket_td').find('.ticket_name').val()
           obj.find('.ticket_td').find('.ticket_name').prev().text(ticketName)
           const ticketPrice=  obj.find('.ticket_td').find('.ticket_price').val()
           obj.find('.ticket_td').find('.ticket_price').prev().text(ticketPrice)
           obj.find('.ticket_td').find('input').addClass('d-none')
           obj.find('.ticket_td').find('span').removeClass('d-none')
            console.log(obj);
            
        });
        $(document).on('click', '.save', function(e) {
            const obj = $('.ticket_body')
            console.log(obj)
            const ticket_name = obj.find('.ticket_name').val();
            const ticket_price = obj.find('.ticket_price').val();
            console.log(obj.find('.ticket_name').val());

            obj.append(`<tr class="ticket_data_row">
                        <td>1</td>
                        <td class="ticket_td"><span class="ticket_text">${ticket_name} </span>  <input type="text" class="form-control ticket_name ticket_input d-none" name="ticket[name][]" value="${ticket_name}" required/></td>
                        <td class="ticket_td"><span class="ticket_text">${ticket_price}</span>  <input type="number" class="form-control ticket_price ticket_input d-none" name="ticket[price][]"  value="${ticket_price}" required/></td>
                        <td>
                        <button class="btn btn-primary save-inline d-none" type="button">save</button>
                        <button class="btn btn-primary edit" type="button">edit</button>
                        <button class="btn btn-primary delete" type="button">delete</button>
                        
                        </td>
                    </tr>`);
                    $('.ticket_field_row').remove();
        });
        $('.add_new_ticket').on('click', function(e) {
            // e.preventDefault();
            if($('.ticket_table tbody').find('.ticket_field_row').length==0) {
             $('.ticket_table tbody').prepend(`<tr class="ticket_field_row">
                        <td>1</td>
                        <td>
                       
                            <input type="text" class="form-control ticket_name" required/>
                                <div class="invalid-feedback">
                                    Please provide a valid ticket name.
                                </div>
                        </td>
                        <td>
                       
                        <input type="number" class="form-control ticket_price" required/>
                                <div class="invalid-feedback">
                                    Please provide a valid amount.
                                </div>
                        </td>
                        <td>
                        <button class="btn btn-primary save" type="button">save</button>
                        </td>
                    </tr>`);    
            }
           
        });

    });
</script>


@endsection