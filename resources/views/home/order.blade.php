<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order NFX Robot</title>
</head>
<body>

    <form action="{{ route('order-confirmation') }}">

        <input type="email" name="email" id="email" @auth
            value="{{ auth()->user()->email }}"
        @endauth>

        @guest
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
            <br>
            
            <label for="password_confirm">ReType Password</label>
            <input type="password" name="password_confirmation" id="password_confirm">

        @endguest


        <label for="bankName"> Select Bank</label>

        <select name="method" id="bankName"> 
            <option value="perfectmoney"> perfectmoney </option>
            <option value="perfectmoney"> perfectmoney </option>
            <option value="perfectmoney"> perfectmoney </option>
            <option value="perfectmoney"> perfectmoney </option>
        </select>



        <button type="submit"> confirm </button>
    
    </form>


       
</body>
</html>