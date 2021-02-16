@if ($errors->any())
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="far fa-lightbulb mr-1"></i> <strong>Terjadi kesalahan!</strong> <br/>
        @foreach ($errors->all() as $error)
            {{ $error }} <br/>
        @endforeach
    </div>
@endif

@if ($message = session('error'))
    <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="far fa-lightbulb mr-1"></i> <strong>Terjadi kesalahan!</strong> <br/>
        {{ $message }}
    </div>
@endif

@if ($message = session('success'))
    <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <i class="far fa-lightbulb mr-1"></i> <strong>Berhasil!</strong> <br/>
        {{ $message }}
    </div>
@endif
