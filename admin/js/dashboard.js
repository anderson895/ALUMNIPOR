$(document).ready(function () {

    const getAnalyticsCount = () => {
        $.ajax({
          url: 'backend/end-points/get_analytics.php', // PHP file where the data is coming from
          type: 'GET',
          dataType: 'json',
          success: function(response) {
              console.log(response.totalreport);
    
              let total_alumni = response.total_alumni;
              let total_campus = response.total_campus;
           
              $('.total_alumni').text(total_alumni);
              $('.total_campus').text(total_campus);
    
             
       
          },
          error: function(xhr, status, error) {
              console.error("Error fetching order status counts:", error);
          }
      });
    };
    
    setInterval(() => {
        getAnalyticsCount();
      }, 3000);
    
    
      getAnalyticsCount();
    });