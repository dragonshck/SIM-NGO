<div class="navbar-collapse collapse" id="navbarVerticalCollapse" style="">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
          @cannot('read access anak')
          <!-- parent pages-->
          <a class="nav-link" href="{{ route('home') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center">
                <span class="nav-link-icon">
                    <svg class="svg-inline--fa fa-chart-pie fa-w-17" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
                </span>
                <span class="nav-link-text ps-1">Dashboard</span>
            </div>
          </a>
          @endcannot
        </li>
        @can('read access tutor')
        <li class="nav-item">
          <!-- label-->
          <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
            <div class="col-auto navbar-vertical-label">Tutor
            </div>
            <div class="col ps-0">
              <hr class="mb-0 navbar-vertical-divider">
            </div>
          </div>
          <!-- parent pages-->
          <a class="nav-link dropdown-indicator" href="#user" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Absensi Anak</span>
            </div>
          </a>
          <ul class="nav false collapse" id="user" style="">
            <li class="nav-item"><a class="nav-link" href="{{ route('absenanak.index') }}" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-text ps-1">+ Absensi Anak</span>
                </div>
              </a>
              <!-- more inner pages-->
            </li>
          </ul>
          <!-- parent pages-->
          <a class="nav-link" href="{{ route('lessonplan.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chalkboard-teacher"></span></span><span class="nav-link-text ps-1">Lesson Plan</span>
            </div>
          </a>
          <!-- parent pages-->
          <a class="nav-link" href="{{ route('logbook.index') }}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Logbook Mengajar</span>
            </div>
          </a>
          <!-- parent pages-->
          <a class="nav-link" href="{{ route('rapor.index')}}" role="button" aria-expanded="false">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-connectdevelop"></span></span><span class="nav-link-text ps-1">Rapor</span>
            </div>
          </a>
        </li>
        @endcan

        @can('read access anak')
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Anak
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>

            <!-- parent pages-->
            <a class="nav-link" href="{{ route('rapor.index')}}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-connectdevelop"></span></span><span class="nav-link-text ps-1">Rapor</span>
              </div>
            </a>
        </li>
        @endcan

        @can('read access mentor')
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Mentor
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('kodeabsensi.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Kode Absensi</span>
              </div>
            </a>
            
            {{-- parent pages --}}
            <a class="nav-link" href="{{ route('anak.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-phoenix-squadron"></span></span><span class="nav-link-text ps-1">Anak</span>
              </div>
            </a>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('absenanak.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-wolf-pack-battalion"></span></span><span class="nav-link-text ps-1">Absensi Anak</span>
              </div>
            </a>
            <a class="nav-link" href="{{ route('lessonplan.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chalkboard-teacher"></span></span><span class="nav-link-text ps-1">Lesson Plan</span>
              </div>
            </a>

            <!-- parent pages-->
            <a class="nav-link" href="{{ route('kelompokumur.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Kelompok Umur</span>
              </div>
            </a>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('rapor.index')}}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-connectdevelop"></span></span><span class="nav-link-text ps-1">Rapor</span>
              </div>
            </a>
        </li>
        @endcan

        @can('read access sekretaris')
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Sekretaris
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>
            
            <!-- parent pages-->
            <a class="nav-link dropdown-indicator" href="#user1" role="button" data-bs-toggle="collapse" aria-expanded="false" aria-controls="user1">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user"></span></span><span class="nav-link-text ps-1">Absensi Karyawan</span>
              </div>
            </a>
            
            <ul class="nav false collapse" id="user1" style="">
              <li class="nav-item"><a class="nav-link" href="{{ route('absensistaff.index') }}" aria-expanded="false">
                  <div class="d-flex align-items-center"><span class="nav-link-text ps-1">+ Absensi Karyawan</span>
                  </div>
                </a>
                <!-- more inner pages-->
              </li>
            </ul>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('kegiatanppa.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar"></span></span><span class="nav-link-text ps-1">Kegiatan</span>
                </div>
            </a>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('sponsormaster.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-empire"></span></span><span class="nav-link-text ps-1">Sponsors</span>
                </div>
            </a>
        </li>
        @endcan

        @can('read access bendahara')
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Bendahara
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('bantuan.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bahai"></span></span><span class="nav-link-text ps-1">Bantuan</span>
              </div>
            </a>

            <a class="nav-link" href="{{ route('rewards.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-smile"></span></span><span class="nav-link-text ps-1">Rewards</span>
                </div>
            </a>

            <a class="nav-link" href="{{ route('hadiahsponsor.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-battle-net"></span></span><span class="nav-link-text ps-1">Sponsors</span>
                </div>
            </a>

            <a class="nav-link" href="/lap-pengeluaran" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Sebaran Keuangan</span>
                </div>
            </a>
        </li>
        @endcan

        @can('read access koordinator')
        <li class="nav-item">
            <!-- label-->
            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label">Koordinator
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('staffppa.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-astronaut"></span></span><span class="nav-link-text ps-1">Staffs</span>
              </div>
            </a>

            <a class="nav-link" href="{{ route('penggajian.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-money-check-alt"></span></span><span class="nav-link-text ps-1">Penggajian</span>
                </div>
            </a>

            <a class="nav-link" href="{{ route('jabatanstaff.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-star"></span></span><span class="nav-link-text ps-1">Jabatan</span>
                </div>
            </a>

            <a class="nav-link" href="{{ route('absensistaff.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-heart"></span></span><span class="nav-link-text ps-1">Absensi Staff</span>
              </div>
            </a>

            {{-- <a class="nav-link" href="{{ route('role.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-dragon"></span></span><span class="nav-link-text ps-1">Roles</span>
              </div>
            </a>

            <a class="nav-link" href="{{ route('permission.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-dungeon"></span></span><span class="nav-link-text ps-1">Permission</span>
              </div>
            </a> --}}
            

            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label"><span class="fas fa-fire"></span>
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>

            <a class="nav-link" href="/lap-pengeluaran" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Sebaran Keuangan</span>
              </div>
          </a>

          <a class="nav-link" href="{{ route('bantuan.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bahai"></span></span><span class="nav-link-text ps-1">Bantuan</span>
              </div>
            </a>

            <a class="nav-link" href="{{ route('rewards.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-smile"></span></span><span class="nav-link-text ps-1">Rewards</span>
                </div>
            </a>

            <a class="nav-link" href="{{ route('hadiahsponsor.index') }}" role="button" aria-expanded="false">
                <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-battle-net"></span></span><span class="nav-link-text ps-1">Sponsors</span>
                </div>
            </a>

            <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
              <div class="col-auto navbar-vertical-label"><span class="fas fa-fire"></span>
              </div>
              <div class="col ps-0">
                <hr class="mb-0 navbar-vertical-divider">
              </div>
            </div>
            <!-- parent pages-->
            <a class="nav-link" href="{{ route('kegiatanppa.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-calendar"></span></span><span class="nav-link-text ps-1">Kegiatan</span>
              </div>
          </a>
          <!-- parent pages-->
          <a class="nav-link" href="{{ route('sponsormaster.index') }}" role="button" aria-expanded="false">
              <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-empire"></span></span><span class="nav-link-text ps-1">Sponsors</span>
              </div>
          </a>
        </li>

        <div class="row navbar-vertical-label-wrapper mt-3 mb-2">
          <div class="col-auto navbar-vertical-label"><span class="fas fa-fire"></span>
          </div>
          <div class="col ps-0">
            <hr class="mb-0 navbar-vertical-divider">
          </div>
        </div>
        <a class="nav-link" href="{{ route('kodeabsensi.index') }}" role="button" aria-expanded="false">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><svg class="svg-inline--fa fa-comments fa-w-18" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="comments" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M416 192c0-88.4-93.1-160-208-160S0 103.6 0 192c0 34.3 14.1 65.9 38 92-13.4 30.2-35.5 54.2-35.8 54.5-2.2 2.3-2.8 5.7-1.5 8.7S4.8 352 8 352c36.6 0 66.9-12.3 88.7-25 32.2 15.7 70.3 25 111.3 25 114.9 0 208-71.6 208-160zm122 220c23.9-26 38-57.7 38-92 0-66.9-53.5-124.2-129.3-148.1.9 6.6 1.3 13.3 1.3 20.1 0 105.9-107.7 192-240 192-10.8 0-21.3-.8-31.7-1.9C207.8 439.6 281.8 480 368 480c41 0 79.1-9.2 111.3-25 21.8 12.7 52.1 25 88.7 25 3.2 0 6.1-1.9 7.3-4.8 1.3-2.9.7-6.3-1.5-8.7-.3-.3-22.4-24.2-35.8-54.5z"></path></svg><!-- <span class="fas fa-comments"></span> Font Awesome fontawesome.com --></span><span class="nav-link-text ps-1">Kode Absensi</span>
          </div>
        </a>
        
        {{-- parent pages --}}
        <a class="nav-link" href="{{ route('anak.index') }}" role="button" aria-expanded="false">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-phoenix-squadron"></span></span><span class="nav-link-text ps-1">Anak</span>
          </div>
        </a>
        <!-- parent pages-->
        <a class="nav-link" href="{{ route('absenanak.index') }}" role="button" aria-expanded="false">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fab fa-wolf-pack-battalion"></span></span><span class="nav-link-text ps-1">Absensi Anak</span>
          </div>
        </a>
        <a class="nav-link" href="{{ route('lessonplan.index') }}" role="button" aria-expanded="false">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-chalkboard-teacher"></span></span><span class="nav-link-text ps-1">Lesson Plan</span>
          </div>
        </a>
        @endcan

        @cannot('read access anak')
        <a class="nav-link" href="{{ route('cutiizin.index') }}" role="button" aria-expanded="false">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-archive"></span></span><span class="nav-link-text ps-1">Cuti / Izin</span>
          </div>
        </a>
        @endcannot

    </ul>
</li>
        
</ul>
      
</div>
</div>