<script>
  function getTotalPrice (id, time_start, time_end, services) {
    $.ajax({
      url: "{{ route('bookings.total-price') }}",
      type: 'get',
      dataType: 'json',
      data: {
        time_start: time_start,
        time_end: time_end,
        'services[]': services,
        product_id: id,
        _token: '{{ csrf_token() }}'
      },
      success: function (response) {
        $('#booking-total-price').text(response.data.total_price)
      },
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseJSON)
      }
    })
  }
</script>
