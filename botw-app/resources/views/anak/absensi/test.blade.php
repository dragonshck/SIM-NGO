@for($i = 0; $i < $count; $i++)
                @if($item_absensi['tanggal_absen'] == $all_periode[$i])
                    @if ($item_absensi['status_absen'] == 1)
                    <td><span class="fas fa-check"></span></td>
                    @elseif($item_absensi['status_absen'] == 2)
                    <td><span class="fas fa-envelope-square"></span></td>
                    
                    @elseif($item_absensi['status_absen'] == 3)
                    <td><span class="fas fa-hospital-symbol"></span></td>

                    @elseif($item_absensi['status_absen'] == 4)
                    <td><span class="fas fa-exclamation-triangle"></span></td>
                        
                    @endif
                    @else
                    <td></td>
                    @endif
                @endfor