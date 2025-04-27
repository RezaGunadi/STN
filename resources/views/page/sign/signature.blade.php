<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Tangan</title>
    <style>
        canvas {
            border: 1px solid #000;
            width: 100%;
            height: 300px;
        }
    </style>
</head>
<body>

    <h1>Input Tanda Tangan</h1>

    <canvas id="signature-pad"></canvas>
    <br>
    <button id="clear-btn">Clear</button>
    <button id="save-btn">Save</button>

    <form id="signature-form" action="{{ route('signature.store') }}" method="POST">
        @csrf
        <input type="hidden" name="signature" id="signature">
        <button type="submit" style="display:none;">Submit</button>
    </form>

    <script>
        const canvas = document.getElementById('signature-pad');
        const ctx = canvas.getContext('2d');
        const clearBtn = document.getElementById('clear-btn');
        const saveBtn = document.getElementById('save-btn');
        const signatureInput = document.getElementById('signature');
        const form = document.getElementById('signature-form');
        
        canvas.width = window.innerWidth - 40; // Adjust canvas width based on the window size
        canvas.height = 300; // Set a fixed height for the canvas

        let drawing = false;

        // Start drawing
        canvas.addEventListener('mousedown', (e) => {
            drawing = true;
            ctx.beginPath();
            ctx.moveTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
        });

        // Draw while mouse is moving
        canvas.addEventListener('mousemove', (e) => {
            if (drawing) {
                ctx.lineTo(e.clientX - canvas.offsetLeft, e.clientY - canvas.offsetTop);
                ctx.stroke();
            }
        });

        // Stop drawing when mouse is released
        canvas.addEventListener('mouseup', () => {
            drawing = false;
        });

        // Clear the canvas
        clearBtn.addEventListener('click', () => {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
        });

        // Save the canvas as PNG and set it to the hidden input field
        saveBtn.addEventListener('click', () => {
            const dataURL = canvas.toDataURL('image/png');
            signatureInput.value = dataURL; // Set the base64 image data to the hidden input
            form.submit(); // Submit the form
        });
    </script>

</body>
</html>
