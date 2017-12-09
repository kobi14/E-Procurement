function getData()
{

  $.ajax({
                url     : 'process.php',
                method  : 'post',
                async: false,
                data:{ sortBy: $('#selectForm').val() },

                success   : function(res)
                {

                   $('#data').html(res);
                },
                error : function(e)
                {
                    alert('error');
                }
            });
          }
