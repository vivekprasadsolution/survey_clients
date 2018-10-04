$('#submit_form').click(function (e)
{
    if (grecaptcha.getResponse() == "")
    {
        e.preventDefault();
        alert("Please Verify Captcha!");
        return false;
    }
    $.ajax({
        type: "POST",
        url: "form_submit.php",
        data: $('#form').serialize() + '&' + $('#checkbox').serialize(),
        success: function (res)
        {
            if (res === 'success')
            {
                window.location = 'thankyou.php';
            }
        }
    });
});
$('#phone').blur(function ()
{
    if (!(/^(07)\d{9}$/.test($(this).val())))
    {
        if (!(/^(01)\d{9}$/.test($('#landline').val())) && !(/^(02)\d{9}$/.test($('#landline').val())))
        {
            alert('Phone No Not Valid');
        }
        $('#landline').removeAttr('readonly');

        return false;
    }
    else
    {
        $('#landline').val('');
        $('#landline').attr('readonly', 'readonly');
    }
});
$('#landline').blur(function ()
{
    if (!(/^(01)\d{9}$/.test($(this).val())) && !(/^(02)\d{9}$/.test($(this).val())))
    {
        if (!(/^(07)\d{9}$/.test($('#phone').val())))
        {
            alert('Landline Not Valid');
        }
        $('#phone').removeAttr('readonly');
        return false;
    }
    else
    {
        $('#phone').val('');
        $('#phone').attr('readonly', 'readonly');
    }
});
$('#phone').keyup(function (event)
{
    var len = $(this).val().length;
    var val = $(this).val();
    if (len === 2 && val !== '07')
    {
        $(this).val('');
        return false;
    }
    if (len > 11)
    {
        event.preventDefault();
        $(this).val(val.slice(0, 11));
        return false;
    }
    var clean_val = val.replace(/\D/g, '');
    $(this).val(clean_val);
});
$('#landline').keyup(function (event)
{
    var len = $(this).val().length;
    var val = $(this).val();
    if (len === 2 && val !== '01' && val !== '02')
    {
        $(this).val('');
        return false;
    }
    if (len > 11)
    {
        event.preventDefault();
        $(this).val(val.slice(0, 11));
        return false;
    }
    var clean_val = val.replace(/\D/g, '');
    $(this).val(clean_val);
});
$('#next').click(function (e)
{
    e.preventDefault();
    if (!(/^(07)\d{9}$/.test(document.getElementById('phone').value)) || document.getElementById('phone').value === '')
    {
        if (!(/^(01|02)\d{9}$/.test(document.getElementById('landline').value)))
        {
            alert('Phone No Not Valid');
            //$('#phone').focus();
            e.preventDefault();
            return false;
        }
    }
    if (!(/^(01|02)\d{9}$/.test(document.getElementById('landline').value)) || document.getElementById('landline').value === '')
    {
        if (!(/^(07)\d{9}$/.test(document.getElementById('phone').value)))
        {
            alert('Landline Not Valid');
            //$('#phone').focus();
            e.preventDefault();
            return false;
        }
    }

    if ($('#title').val() === '')
    {
        $('#title').focus();
        alert('Title Required');
        e.preventDefault();
        return false;
    }
    if ($('#first_name').val() === '')
    {
        $('#first_name').focus();
        alert('First Name Required');
        e.preventDefault();
        return false;
    }
    if ($('#last_name').val() === '')
    {
        $('#last_name').focus();
        alert('Last Name Required');
        e.preventDefault();
        return false;
    }
    if ($('#postcode').val() === '')
    {
        $('#postcode').focus();
        alert('Postcode Required');
        e.preventDefault();
        return false;
    }
    if ($('#address').val() === '')
    {
        $('#address').focus();
        alert('Address Required');
        e.preventDefault();
        return false;
    }
    if ($('#city').val() === '')
    {
        $('#city').focus();
        alert('City Required');
        e.preventDefault();
        return false;
    }
    if ($('#homeowner').val() === '')
    {
        $('#homeowner').focus();
        alert('Home Status Required');
        e.preventDefault();
        return false;
    }
    if ($('#marital').val() === '')
    {
        $('#marital').focus();
        alert('Select Marital Status');
        e.preventDefault();
        return false;
    }
    if ($('#privacy').prop('checked') === false)
    {
        $('#privacy').focus();
        alert('Privacy Policy Is Required');
        e.preventDefault();
        return false;
    }


});