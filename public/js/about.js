$('#addSkills').on('click', function () {
  // console.log('clicked')
  $('#skillsModal').modal('show')
  $('input[type=checkbox]')
    .filter(':checked')
    .each(function () {
      $(this).prop('checked', false)
    })
})

$(document).on('click', '.selectSkills', function () {
  $('input[type=checkbox]')
    .filter(':checked')
    .each(function (index, element) {
      console.log($(this).data('id'))
      let skillsId = $('.skillId').val()

      skillsId += $(this).data('id') + ','
      $('.skillId').val(skillsId)

      let skillName = $(this).data('skill-name')
      let skillPer = $(this).data('skill-per')

      console.log(skillName, skillPer)

      //   let badge =
      $('#skillsList').append(
        `<span class="badge rounded-pill bg-info me-2">${skillName} - ${skillPer}%</span>`,
      )
    })
  $('#skillsModal').modal('hide')
})
