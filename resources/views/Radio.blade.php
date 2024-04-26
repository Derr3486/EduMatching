<style>
    /* CSS to style radio buttons and labels */
    .radio-group {
        display: flex;
        flex-direction: row;
        justify-content: center; 
        margin-top: 5px;
        text-align:center;
        gap: 55px;
    }

    .radio-group input[type="radio"] {
        transform: scale(1.5);
    }

    label {
        margin-bottom: 10px; /* Adjust spacing between radio buttons and labels */
    }
</style>

<div class="radio-group">
    <label>
        <input type="radio" name="{{$name}}" value="1">
        <div class = "number">1</div>
    </label>
    <label>
        <input type="radio" name="{{$name}}" value="2">
        <div class = "number">2</div>
    </label>
    <label>
        <input type="radio" name="{{$name}}" value="3">
        <div class = "number">3</div>
    </label>
    <label>
        <input type="radio" name="{{$name}}" value="4">
        <div class = "number">4</div>
    </label>
    <label>
        <input type="radio" name="{{$name}}" value="5">
        <div class = "number">5</div>
    </label>
</div>

