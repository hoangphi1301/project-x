 $(document).ready(function(){
      $('#btnLogin').click(function(){
          alert('show modal');
      });

      $('#btnSave').click(function(){
          $('#myModal').modal('hide');
       
      });

      $('#myModal').on('show.bs.modal',function(){
          alert('Modal is display');
      });

  });