function getTotalPrice (id, time_start, time_end, services, success) {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  })

  $.ajax({
    url: '/admin/bookings/total-price',
    type: 'get',
    dataType: 'json',
    data: {
      time_start: time_start,
      time_end: time_end,
      'services[]': services,
      product_id: id,
    },
    success: function (response) {
      success(response)
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseJSON)
    }
  })
}