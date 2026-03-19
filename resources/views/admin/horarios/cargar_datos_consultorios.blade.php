<table style="font-size: 15px" class="table table-striped table-hover table-sm table-bordered">
                  <thead>
                    <tr>
                      <th>Hora</th>
                      <th>Lunes</th>
                      <th>Martes</th>
                      <th>Miercoles</th>
                      <th>Jueves</th>
                      <th>Viernes</th>
                      <th>Sabado</th>
                    </tr>
                  </thead>
                  <tbody>
                    @php
                    $horas = ['06:00:00 - 07:00:00','07:00:00 - 08:00:00','08:00:00 - 09:00:00','09:00:00 - 10:00:00','10:00:00 - 11:00:00','11:00:00 - 12:00:00','14:00:00 - 15:00:00','15:00:00 - 16:00:00','16:00:00 - 17:00:00','17:00:00 - 18:00:00'];
                    $diaSemana = ['LUNES','MARTES','MIERCOLES','JUEVES','VIERNES','SABADO'];
                    @endphp
                    @foreach ($horas as $hora)
                    @php
                    list($hora_inicio,$hora_fin) = explode(' - ', $hora);
                    @endphp
                    <tr>
                    <td>{{$hora}}</td>
                    @foreach ($diaSemana as $dia)
                    @php
                    $nombre_doctor = '';
                    foreach ($horarios as $horario) {
                      if(strtoupper($horario->dia) == $dia &&
                      $hora_inicio >= $horario->hora_inicio &&
                      $hora_fin <= $horario->hora_fin){
                      $nombre_doctor = $horario->doctor->nombres."".$horario->doctor->apellidos;
                      break;
                      }
                    }
                    @endphp
                    <td>{{$nombre_doctor}}</td>
                    @endforeach
                    </tr>
                    @endforeach
                  </tbody>
                </table>