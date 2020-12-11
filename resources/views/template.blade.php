@extends('home-theme.master')
@section('content')
<section class="parallax-container" data-parallax-img="home-theme/images/bg-breadcrumbs-about.jpg">
    <div class="parallax-content breadcrumbs-custom context-dark">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-9">
                    <h2 class="breadcrumbs-custom-title">{{ $institution->name }}</h2>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section section-lg bg-gray-1 bg-gray-1-decor">
    <div class="container">
        <div class="row row-50">
            <div class="col-lg-3 pr-xl-4"><img src="{{ asset('img') . '/' . $institution->logo }}" alt="" width="200"
                    height="200" />
            </div>
            <div class="col-lg-9">
                <h3>{{ $institution->name }}</h3>
                <div class="text-with-divider">
                    <div class="divider"></div>
                    <h4 class="text-opacity-70">Historial de Trabajo en la Casa-Hogar :</h4>
                </div>
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Salud</th>
                            <th scope="col">Educación</th>
                            <th scope="col">Desarrollo Social</th>
                            <th scope="col">Recreación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                @foreach ($institution->collabs as $collab)
                                @if ($collab->category == 'Salud')
                                <p>&bull; {{ $collab->date.' '.$collab->title }}</p>
                                <br>
                                @endif
                                @endforeach
                            </td>


                            <td>
                                @foreach ($institution->collabs as $collab)
                                @if ($collab->category == 'Educación')
                                <p>&bull; {{ $collab->date.' '.$collab->title }}</p>
                                <br>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($institution->collabs as $collab)
                                @if ($collab->category == 'Desarrollo Social')
                                <p>&bull; {{ $collab->date.' '.$collab->title }}</p>
                                <br>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @foreach ($institution->collabs as $collab)
                                @if ($collab->category == 'Recreación')
                                <p>&bull; {{ $collab->date.' '.$collab->title }}</p>
                                <br>
                                @endif
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
@endsection