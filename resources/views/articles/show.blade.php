@extends('layouts.global')
@section('title') Edit article @endsection
@section('content')
<form>

    <input type="hidden" name="_method" value="PUT">
    <div class="container kons">
        @if(session('status'))
            <div class="alert alert-success">
                {{session('status')}}
            </div>
        @endif
        <div class="continaer box shadow-lg rounded">
            @if($article->cover)
                <img src="{{asset('storage/' . $article->cover)}}" width="100%"/>
            @endif

            <div class="tols">
                <div class="col-sm-12">
                    <div class="noborder input-title nospace">
                        {{$article->name}}
                    </div>
                </div>
                <div class="container-fluid row nospace">
                    <div class="col-sm-12">
                        <div class="container-fluid row nospace">
                            <p>Categories   : </p>
                            @foreach($article->categories as $category)
                                <h5>{{$category->name}} </h5>
                            @endforeach
                        </div>

                    </div>
                </div>
                <br>
                <div class="container-fluid row nospace">
                    <div class="col-sm-6">
                        <p>Date</p>
                    </div>
                </div>
                <div class="container-fluid row nospace">
                    <div class="col-sm-6">
                        <div class="container" id="datepicker">
                            {{$article->date}}
                        </div>
                        <script>
                            $('#datepicker').datepicker({
                                uiLibrary: 'bootstrap4'
                            });
                        </script>
                    </div>
                </div>
            </div>

        </div>
        <div style="margin: 10%;">
            <div class="site-section-heading text-center mb-5 w-border col-md-6 mx-auto">
                <h2>article Description</h2>
            </div>
            <div class="fr-view shadow-lg rounded" style="border: 1px solid; padding:5% 10%;">
                {!! $article->description !!}
            </div>
            <br><br>
        </div>
    </div>
</form>
@endsection
@section('footer-scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>

<script>

$('#categories').select2({
  ajax: {
    url: 'http://127.0.0.1:8000/ajax/categories/search',
    processResults: function(data){
        placeholder:"Select a state"
        return {
            results: data.map(function(item){return {id: item.id, text: item.name} })
        }
    }
  }
});
$('.select2-selection').css('border-top','1px')
$('.select2-container').children().css('border-top','1px')
$('.select2-selection').css('border-left','1px')
$('.select2-container').children().css('border-left','1px')
$('.select2-selection').css('border-right','1px')
$('.select2-container').children().css('border-right','1px')
$('.select2-selection').css('border-radius','0px')
$('.select2-container').children().css('border-radius','0px')
</script>
<script>
  new FroalaEditor('textarea#froala-editor',{
    theme: 'dark',
    zIndex: 2003,
  })
</script>
@endsection
