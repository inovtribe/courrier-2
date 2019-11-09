
WebViewer({
    path: 'WebViewer/lib', // path to the PDFTron 'lib' folder on your server
    initialDoc: 'https://pdftron.s3.amazonaws.com/downloads/pl/webviewer-demo.pdf',
    },
    document.getElementById('viewer'))
    .then(function(instance) {
        var docViewer = instance.docViewer;
        var annotManager = instance.annotManager;
        docViewer.on('documentLoaded', function() {

        });
    });
