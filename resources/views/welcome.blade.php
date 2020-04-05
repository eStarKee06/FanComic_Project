<div>Sign Up</div>
<form action="/signUp" method="POST">
    @csrf
    <label>email: </label>
    <input name="email"/>
    <label>userName: </label>
    <input name="username"/>
    <label>password: </label>
    <input name="password"/>
    <button type="submit">submit</button>
</form>


<div>Sign In</div>
<form action="/signIn" method="POST">
    @csrf
    <label>userName: </label>
    <input name="userName"/>
    <label>password: </label>
    <input name="passWord"/>
    <button type="submit">submit</button>
</form>


