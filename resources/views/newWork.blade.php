<div>create new work</div>
<form action="/newWork" method="POST">
    @csrf
    <label>Title: </label>
    <input name="title"/>
    <label>Description: </label>
    <input name="description"/>
    <label>genre: </label>
    <input name="genre"/>
    <button type="submit">submit</button>
</form>
