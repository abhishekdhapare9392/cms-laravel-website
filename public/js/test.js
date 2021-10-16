$('#addTest').on('click', function () {
  console.log('clicked')
  $('#testModal').modal('show')
  $('input[type=checkbox]')
    .filter(':checked')
    .each(function () {
      $(this).prop('checked', false)
    })
})

$('.selectTest').on('click', function () {
  $('input[type=checkbox]')
    .filter(':checked')
    .each(function (index, element) {
      console.log($(this).data('id'))
      let testsId = $('.testId').val()

      testsId += $(this).data('id') + ','
      $('.testId').val(testsId)

      let testName = $(this).data('testimonial-name')
      let testDes = $(this).data('testimonial-des')
      let testCom = $(this).data('testimonial-com')

      $('#testimonials-selected').append(`
        <tr>
          <td>${testName}</td>
          <td>${testDes}</td>
          <td>${testCom}</td>
        </tr>
      `)
      // console.log(testName,testDes,testCom)
      $('#testModal').modal('hide')
    })
})
