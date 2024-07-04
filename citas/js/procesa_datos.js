
    var calendar;
    var Calendar = FullCalendar.Calendar;
    var events = [];
    $(function() {
        if (!!scheds) {
            Object.keys(scheds).map(k => {
                var row = scheds[k]
                events.push({ id: row.id, title: row.title, start: row.start_datetime });
            })
        }
        calendar = new Calendar(document.getElementById('calendar'), {
            locale:'es',
            headerToolbar:{
                left:'prev,next, today',
                center:'title',
                right:'dayGridMonth,timeGridWeek,timeGridDay,list'
                },
                buttonText: {
                    today: 'Hoy', // establecer el texto en español para "today"
                    month: 'Mes', // establecer el texto en español para "month"
                    week: 'Semana', // establecer el texto en español para "week"
                    day: 'Día', // establecer el texto en español para "day"
                    list: 'Lista'
                  },
                selectable: true,
                themeSystem: 'bootstrap',
                //Random default events
                events: events,
                /*eventClick: function(info) {
                   
                    var _details = $('#event-details-modal')
                    var id = info.event.id
                    if (!!scheds[id]) {
                        _details.find('#title').text(scheds[id].title)
                        _details.find('#identificacion').text(scheds[id].identificacion)
                        _details.find('#telefono').text(scheds[id].telefono)
                        _details.find('#description').text(scheds[id].description)
                        _details.find('#especialidad').text(scheds[id].especialidad)
                        _details.find('#start').text(scheds[id].sdate) 
                        _details.find('#edit,#delete').attr('data-id', id)
                        _details.modal('show')
                    } else {
                        alert("Event is undefined");
                    }
                },*/
                
                eventClick: function(info) {
                    var _details = $('#event-details-modal');
                    var id = info.event.id;
                  
                    if (!!scheds[id]) {
                      $.ajax({
                        url: "validardoctor.php",
                        type: "POST",
                        data: { valor: scheds[id].especialidad },
                        dataType: "json",
                        success: function(response) {
                            _details.find('#nombre').text(scheds[id].nombre);
                            _details.find('#id_users').text(scheds[id].identificacion);
                            _details.find('#telefono').text(scheds[id].telefono);
                            _details.find('#descripcion').text(scheds[id].descripcion);
                            _details.find('#fecha').text(scheds[id].sdate);
                            _details.find('#edit,#delete').attr('data-id', id);
                            _details.modal('show');
                      
                            if (response.nombre !== null && response.consultorio !== null) {
                              _details.find('#nombre').text(response.nombre);
                              _details.find('#especialidad').text(response.especialidad);
                              _details.find('#consultorio').text(response.consultorio);
                            } else {
                                alert('Cita invalida por falta de medico')
                              _details.find('#nombre').text("Médico no disponible");
                              _details.find('#especialidad').text("");
                              _details.find('#consultorio').text("");
                            }
                        }
                      });
                    } else {
                      alert("Evento no definido.");
                      
                    }
                  },
                  
                  
                eventDidMount: function(info) {
                    // Do Something after events mounted
                },
                editable: true
            });

        calendar.render();
    
        // Form reset listener
        $('#schedule-form').on('reset', function() {
            $(this).find('input:hidden').val('')
            $(this).find('input:visible').first().focus()
            
        })
        
        
        // Edit Button
        $('#edit').click(function() {
            var id = $(this).attr('data-id')
            
            if (!!scheds[id]) {
            var _details = $('#event-details-modal')
            var _form = $('#schedule-form')
            
            _details.modal('hide')

            _form.find('[name="id"]').val(id)
            _form.find('[name="title"]').val(scheds[id].title)
            _form.find('[name="identificacion"]').val(scheds[id].identificacion)
            _form.find('[name="telefono"]').val(scheds[id].telefono)
            _form.find('[name="description"]').val(scheds[id].description)
            _form.find('[name="especialidad"]').val(scheds[id].especialidad)
            _form.find('[name="start_datetime"]').val(String(scheds[id].start_datetime).replace(" ", "T"))
           

            $('#formulario-modal').modal('show')         
            _form.find('[name="title"]').focus()
            }             
            else {
            alert("Event is undefined");
            }

        })
    
        // Delete Button / Deleting an Event
        $('#delete').click(function() {
            var id = $(this).attr('data-id')
            if (!!scheds[id]) {
                var _conf = confirm("Estas seguro de borrar ese dato?");
                if (_conf === true) {
                    location.href = "./delete_schedule.php?id=" + id;
                }
            } else {
                alert("Event is undefined");
            }
        })
    })

    

