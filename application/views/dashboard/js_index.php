<script>
  $(document).ready(function() {
    $('.datatable-posts').DataTable({
      // "dom": 'flrtip',
      "dom": '<t><"bottom float-right" p>',
      "order": [
        [2, "desc"]
      ],
    });

    $('.datatable-users').DataTable({
      "dom": '<t><"bottom float-right" p>',
      "ordering": false
    });
    $('.datatable-peringkat').DataTable({
      "dom": '<t><"bottom float-right" p>',
      "ordering": false
    });
  });
</script>
<script>
  var database = firebase.database();

  function writeUserData() {
    firebase.database().ref('users/<?= user_info()['id'] ?>').set({
      status: 'online',
    });
  }

  // writeUserData('1', 'tes', 'tes@tes.com', null)
  function readData() {
    var starCountRef = firebase.database().ref('users/');
    starCountRef.on('value', (snapshot) => {
      const data = snapshot.val();
      // updateStarCount(postElement, data);
      // console.log(data)
      var html = ''
      for (const prop in data) {
        // console.log(`data.${prop} = ${data[prop]['connections']}`);
        html += `
        <tr>
          <td>${data[prop]['nama_lengkap']}</td>
        `
        // check online or offline
        if (`${data[prop]['connections']}` == 'undefined') {
          html += `<td><span class="badge badge-secondary">Offline</span></td>`
        } else {
          html += `<td><span class="badge badge-primary">Online</span></td>>`
        }

        // check wa
        if (`${data[prop]['wa']}` != '') {
          html += `<td>
                  <a href="http://wa.me/${data[prop]['wa']}" target="_blank" rel="noopener noreferrer"><i class="fab fa-whatsapp"></i> Chat</a>
                  </td>`
        } else {
          html += `<td><span class="badge badge-secondary">Tidak ada</span></td>`
        }

        html += `</tr>`
      }
      $('#tbody-users').html(html)
    });
  }

  readData()
  
</script>