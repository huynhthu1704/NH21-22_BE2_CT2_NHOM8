const formProfile = document.querySelector('#set-profile');

formProfile.addEventListener('submit', async (e) => {

    e.preventDefault();

    const province = document.querySelector('.register-city')
    const district = document.querySelector('.register-district')
    const ward = document.querySelector('.register-ward')
    
    const formData = new FormData(e.target)

    formData.set('register-city', `${province.options[province.selectedIndex].text}-${province.value}`);
    formData.set('register-district', `${district.options[district.selectedIndex].text}-${district.value}`);
    formData.set('register-ward', `${ward.options[ward.selectedIndex].text}-${ward.value}`);

    const formProps = Object.fromEntries(formData);
    console.log(formProps);
    const response = await fetch('dashboard/profile/edit',
        {
            method: 'POST',
            headers: {
                "Content-type": "application/json;charset=UTF-8",
                'X-CSRF-TOKEN': formProps._token,
            },
            body: JSON.stringify(formProps)
        }
    )
    const result = await response.json();

    if (result == true) {
        $('#edit-profile-alert').addClass('alert-success').removeClass('alert-danger');
        $('#edit-profile-alert').text("Edit successfully");
        $('#edit-profile-alert').fadeTo(2000, 500).slideUp(500, function () {
            $(".alert").slideUp(500);
        });
    }
    else {
        $('#edit-profile-alert').addClass('alert-danger').removeClass('alert-success');
        $('#edit-profile-alert').text(result[Object.keys(result)[0]]);
        $('#edit-profile-alert').fadeTo(2000, 500).slideUp(500, function () {
            $(".alert").slideUp(500);
        });
    }
})

function openEditUser() {
    document.querySelector('#tab-account-link').click()
}