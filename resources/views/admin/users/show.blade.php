<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <title>User Profile</title>
    <link rel="stylesheet" href="{{ asset('admin/assets/css/style.css') }}">
</head>
<body>

<div style="margin-left:50px;">
    <form name="updateticket" id="updateticket" method="post">
        <table width="100%" border="1" cellspacing="0" cellpadding="0">
            <tr>
                <td colspan="2" style="text-align:center"><b>{{ $user->fullName }}'s profile</b></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
            </tr>
            <tr height="50">
                <td><b>Reg Date:</b></td>
                <td>{{ $user->regDate }}</td>
            </tr>
            <tr height="50">
                <td><b>User Email:</b></td>
                <td>{{ $user->userEmail }}</td>
            </tr>
            <tr height="50">
                <td><b>User Contact no:</b></td>
                <td>{{ $user->contactNo }}</td>
            </tr>
            <tr height="50">
                <td><b>Address:</b></td>
                <td>{{ $user->address }}</td>
            </tr>
            <tr height="50">
                <td><b>State:</b></td>
                <td>{{ $user->State }}</td>
            </tr>
            <tr height="50">
                <td><b>Country:</b></td>
                <td>{{ $user->country }}</td>
            </tr>
            <tr height="50">
                <td><b>Pincode:</b></td>
                <td>{{ $user->pincode }}</td>
            </tr>
            <tr height="50">
                <td><b>Last Updation:</b></td>
                <td>{{ $user->updationDate }}</td>
            </tr>
            <tr height="50">
                <td><b>Status:</b></td>
                <td>
                    @if($user->status == 1)
                        Active
                    @else
                        Block
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <input name="Submit2" type="button" class="btn btn-primary" value="Close this window" onclick="window.close();" style="cursor: pointer;" />
                </td>
            </tr>
        </table>
    </form>
</div>

</body>
</html>
