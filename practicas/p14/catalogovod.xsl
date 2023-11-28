<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:output method="html" encoding="UTF-8" doctype-public="-//W3C//DTD XHTML 1.0 Strict//EN" doctype-system="http://www.w3.org/TR/xhtml1/DTD/strict.dtd"/>
    <xsl:template match="/">
        <html>
            <head>
                <title>Prime video</title>
                <link rel="icon" href="logo.png" type="image/x-icon"/>
                <meta name="viewport" content="width=device-width, initial-scale=1"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"/>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"/>
            </head>
            <body>
                <div class="p-3 bg-primary text-white text-center">
                    <p style="text-align: center; font-size: 60px;"><img src="logo.png"
                        alt="logo" width="100px" height="100px" class="rounded"/> <strong>Prime video</strong></p>
                </div>
                <div class="container mt-3">
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr class="table-success">
                                <th colspan="4">Cuentas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-warning fw-bold">
                                <td>Usuario</td>
                                <td>Idioma</td>
                            </tr>
                            <xsl:for-each select="CatalogoVOD/cuenta/perfiles/perfil">
                                <tr class="table-warning">
                                    <td><xsl:value-of select="@usuario"/> </td>
                                    <td><xsl:value-of select="@idioma"/> </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>
                <div class="container mt-3">
                    <h2>Peliculas</h2>
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr class="table-success">
                                <th colspan="4">Peliculas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-warning fw-bold">
                                <td>Titulo</td>
                                <td>Duración</td>
                                <td>Género</td>
                            </tr>
                            <xsl:for-each select="//contenido/peliculas/genero/titulo">
                                <tr class="table-warning">
                                    <td> <xsl:value-of select="./text()"/> </td>
                                    <td><xsl:value-of select="./@duracion"/> </td>
                                    <td><xsl:value-of select="../@nombre"/> </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>
                
                <div class="container mt-3">
                    <h2>Series</h2>
                    <table class="table table-bordered text-center table-hover">
                        <thead>
                            <tr class="table-success">
                                <th colspan="4">Series</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="table-warning fw-bold">
                                <td>Titulo</td>
                                <td>Duración</td>
                                <td>Género</td>
                            </tr>
                            <xsl:for-each select="//contenido/series/genero/titulo">
                                <tr class="table-warning">
                                    <td> <xsl:value-of select="./text()"/> </td>
                                    <td><xsl:value-of select="./@duracion"/> </td>
                                    <td><xsl:value-of select="../@nombre"/> </td>
                                </tr>
                            </xsl:for-each>
                        </tbody>
                    </table>
                </div>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>