<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .red{
            color: red;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css">
</head>
<body>
@include('sweetalert::alert')

      <h1>Welcome to Alpine JS</h1>
      @foreach(admin_menu_items() as $menuItem)
          <li>{{$menuItem['title']}}</li>
          @if($menuItem['sub'])
              <ul>
              @foreach($menuItem['sub'] as $sub)
                 <li>{{$sub['title']}}</li>
              @endforeach
              </ul>
          @endif
      @endforeach


        <div x-data="{ count:0 }">
            <button @click="count++">+</button>
            <button @click="count--">-</button>
            <span x-text="count"></span>
        </div>

        <div x-data="{ tweet:'Say Something' }">
            <textarea x-model="tweet"></textarea>
            <div x-text="tweet.length" x-bind:class="tweet.length > 20 ? 'red' : '' "></div>
        </div>

{{--        <div x-data="{}" x-init="alert('I want to make love to Rita')">--}}
{{--        </div>--}}

        <div x-data="dropDown()">
            <button @click="show">DropDown</button>
            <div x-show.transition.duration.3000ms="open" @click.away="open = false">
                Dropdown Contents
            </div>
        </div>
<button type="button" class="btn btn-labeled btn-success">
    <span class="btn-label"><i class="fas fa-user"></i></span>Success</button>
</body>
<script src="{{asset('js/alpine.js')}}"></script>
<script>
    function dropDown() {
        return {
            open:false,
            show(){
                this.open = true
            }
        }
    }
</script>
</html>
