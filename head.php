

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title><?php echo $title ?></title>
   <link rel="stylesheet" href="style.css">
   <script src="./script.js" defer></script>
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

   <style>
      *{
         font-family: 'Poppins', sans-serif;
         padding: 0;
         margin: 0;
         box-sizing: border-box;
      }
      a,button{
         all: unset;
         cursor: pointer;
      }
      input{
         outline: none;
         border: none;
      }

      :root{
         --main-text: rgba(51, 51, 51);
         --secondary-text: rgba(130, 130, 130, 1);
         --borders: rgba(189, 189, 189);

         --blue1: rgba(47, 128, 237);
         --blue2: rgba(45, 156, 219);

      }
      .errorMsg{
         background: #d9534f;
         color: white;
         width: 100%;
         padding: 1rem;
         border-radius: 1rem;
         border: 1px solid red;
         margin-bottom: 1rem;
         
      }
      .profile{
         position: relative;
      }
      .dropdownMenu{
         position: absolute;
         top: 110%;
         left: 50%;
         transform: translateX(-50%);
         padding: 0.5rem;
         display: none;
         transition: 0.3s;
         background: white;
         border: 1px solid var(--borders);
         border-radius: 1rem;
      }
      .dropdownMenu li {
         list-style: none;
         border-radius: 10px;
         
      }
      .dropdownMenu li:hover {
         background: #eee;
      }


      .dropdownMenu li a{
         padding: 0.5rem 1.3rem;
         white-space: nowrap;
         display: block;
         color: var(--main-text);
      }
      .dropdownMenu li.logout a{
         color: #d9534f ;
      }

      .dropdownMenu.active{
         display: block;
      }

      .profile.active{
         background: #eee;
      }

      .msgContainer {
         text-align: center;
         margin-bottom: 3rem;
      }
      .msgContainer p{
         color: white;
         border: 1px solid green;
         padding: 1rem 3rem;
         border-radius: 10px;
         background: #5cb85c;
         display: inline-block;
      }
   </style>

   <script>

   </script>
</head>