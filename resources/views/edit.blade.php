<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Users</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: #333;
            overflow: hidden;
            perspective: 1500px;
        }

        .background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('/image/pic1.jpg') no-repeat center center/cover;
            filter: blur(2px);
            z-index: -1;
        }

        .container {
            position: relative;
            width: 100%;
            max-width: 500px;
            padding: 30px;
            background: rgba(255, 255, 255, 0.1);
            /* Transparent background */
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            /* Border style */
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            /* Shadow style */
            transform-style: preserve-3d;
            transform: rotateX(5deg) rotateY(5deg);
            z-index: 1;
            color: #fff;
            /* Text color to contrast with the background */
            box-shadow: 0 30px 36px rgba(0, 0, 0, 2);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 2em;
        }

        .form-container {
            display: flex;
            flex-direction: column;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container input,
        .form-container button {
            width: 100%;
            padding: 15px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            background: rgba(255, 255, 255, 0.3);
            /* Slightly opaque fields */
            color: #333;
            /* Darker text color for better readability */
            font-size: 16px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
        }

        .form-container input:focus,
        .form-container button:hover {
            box-shadow: 0 12px 18px rgba(0, 0, 0, 0.2);
            outline: none;
        }

        .form-container button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #0056b3;
        }

        .error-message,
        .success-message {
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 8px;
            font-size: 16px;
        }

        .error-message {
            background-color: #f8d7da;
            color: #721c24;
        }

        .success-message {
            background-color: #d4edda;
            color: #155724;
        }

        /* Raining Effect */
        .raindrop {
            position: absolute;
            width: 2px;
            height: 20px;
            background: rgba(255, 255, 255, 0.6);
            animation: rain 1s linear infinite;
        }

        @keyframes rain {
            to {
                transform: translateY(100vh);
            }
        }
    </style>
</head>

<body>
    <div class="background"></div>
    <div class="container">
        <h1>Update user information</h1>
        @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
        @endif
        @if($errors->any())
        <div class="error-message">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="form-container">
            <form action="/update" method="POST">
                @csrf
                <input type="hidden" name="id" value={{$data['id']}} />
                <input type="text" name="name" value="{{$data['name']}}" required />
                <input type="password" name="password"value="{{$data['password']}}" required />
                <input type="email" name="email" value="{{$data['email']}}" required />
                <button type="submit">Update</button>
            </form>
        </div>
    </div>

    <!-- JavaScript to dynamically add raindrops -->
    <script>
        const numRaindrops = 100; // Adjust the number of raindrops
        const background = document.querySelector('.background');

        for (let i = 0; i < numRaindrops; i++) {
            const raindrop = document.createElement('div');
            raindrop.classList.add('raindrop');
            raindrop.style.left = `${Math.random() * 100}vw`;
            raindrop.style.animationDuration = `${Math.random() * 2 + 1}s`;
            raindrop.style.animationDelay = `${Math.random() * 2}s`;
            background.appendChild(raindrop);
        }
    </script>
</body>

</html>