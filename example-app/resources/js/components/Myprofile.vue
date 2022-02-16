<style>
    *{
        padding: 0;
        margin: 0;
        box-sizing: border-box; 
    }

    .header{
        text-align: center;
        background-color: #a3a3a3;
        padding: 0.3em 1em;
        font-size: 150%;
    }

    .content{
        background-color: lightblue;
        padding: 0.5em 1em;
        padding-left: 2em;
        font-size: 120%;
    }

    .content span{
        font-weight: bold;
    }

    .email a{
        text-decoration: none;
        color: black;
    }

    /* Responsive */
    /* Desktop */
    @media screen and (min-width: 1200px) {
        .wrap{
            border: 2px solid #000;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;;
            margin: auto;
            width: 980px;
            margin-top: 10px;
        }
        .header{ 
            font-size: 2em;
        }
        .content{
            font-size: 1.8em
        }
    }

</style>

<template>
    <div class="wrap">
        <div class="header">
            <h1>My Profile</h1>
        </div>
        <div class="content">
            <div class="name">
                <p><span>Name: </span>Doan Phi Hung</p>
            </div>
            <div class="email">
                <p><span>Email Address: </span> <a href="#">doanphihung5@gmail.com</a></p>
            </div>
            <div class="username">
                <p><span>User Name: </span> Hung</p>
            </div>
            <div class="country">
                <p><span>Country: </span> Ha Noi</p>
            </div>
        </div>
    </div>
</template>

<script>
    
</script>

