// //close an iframe within an iframe
//
// function closeWin()   // Tested Code
// {
//     var someIframe = window.parent.document.getElementById('iframe_callback');
//     someIframe.parentNode.removeChild(someIframe));
// }
// <input class="question" name="Close" type="button" value="Close" onClick="closeWin()" tabindex="10" />
//
//
// //Automatically resize iframe content
// Add this to your <head> section:
//
// <script>
//     function resizeIframe(obj) {
//     obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
// }
// </script>
// And change your iframe to this:
//
// <iframe src="..." frameborder="0" scrolling="no" onload="resizeIframe(this)" />
