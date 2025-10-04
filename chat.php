<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Chat Application</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="d-flex flex-column min-vh-100 text-light bg-dark">
  <main class="container-fluid">
    <div class="row">
      <!-- Sidebar -->
      <aside class="col-2 bg-secondary p-3 min-vh-100 text-center">
        <h4>Sidebar</h4>
        <nav>
          <a class="btn btn-primary" href="index.php" role="button">Index</a>
          <a class="btn btn-primary" href="chat.php" role="button">Chat</a>
        </nav>
        <ul class="list-unstyled">
          <li>placeholder1</li>
          <li>placeholder2</li>
          <li>placeholder3</li>
        </ul>
      </aside>

      <!-- Chat Section -->
      <section class="col-10 d-flex flex-column" style="height: calc(100vh - 10px);">

        <ul id="chatMessages" class="list-group mb-3 mt-3 flex-grow-1 overflow-auto">
        <!-- Chat messages will appear here -->
        </ul>

        <!-- This controls the text box and send button -->
        <div class="input-group mt-auto">
          <input type="text" class="form-control" placeholder="Type your message..." id="chatInput">
          <button class="btn btn-primary" type="button" id="sendBtn">Send</button>
        </div>

      </section>
    </div>
  </main>
  <script>
    const input = document.getElementById('chatInput');
    const button = document.getElementById('sendBtn');
    const chatMessages = document.getElementById('chatMessages');

    function getCurrentTime() {
      const now = new Date();
      let hours = now.getHours();
      const minutes = now.getMinutes().toString().padStart(2, '0');
      const ampm = hours >= 12 ? 'PM' : 'AM';
      hours = hours % 12 || 12;
      return `${hours}:${minutes} ${ampm}`;
    }

    button.addEventListener('click', () => {
      const message = input.value.trim();
      if(message) {
        const username = 'Genjo'
        const time = getCurrentTime();
        
        const message_box = document.createElement('li');
          message_box.className = 'text-start flex-wrap mb-2';
          message_box.innerHTML = `<strong style="font-size: 1.1em;">${username}</strong>
                                   <span class="text-tertiary" style="font-size: 0.7em;">
                                      ${time}
                                   </span>
                                    <br>${message}`;

          chatMessages.appendChild(message_box);
          console.log('Sent message:', message);

        input.value = ''; // clear input after sending
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }
    });

    // Optional: send message on Enter key
    input.addEventListener('keypress', (e) => {
      if(e.key === 'Enter') {
        button.click();
      }
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>