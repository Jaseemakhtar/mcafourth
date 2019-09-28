<?xml version="1.0" encoding="UTF-8"?>
<html xsl:version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <body style="font-family:Arial;font-size:12pt;background-color:#EEEEEE">
        <xsl:for-each select="rcu/student">
            <div style="background-color:teal;color:white;padding:4px">
                <span style="font-weight:bold"><xsl:value-of select="name"/></span>
            </div>
            <div style="margin-left:20px;margin-bottom:1em;font-size:10pt">
                <p style="font-style:italic">
                    <ul>
                        <li><xsl:value-of select="usn"/></li>
                        <li><xsl:value-of select="course"/></li>
                        <li><xsl:value-of select="sem"/></li>
                    </ul>
                </p>
            </div>
        </xsl:for-each>
        </body>
</html>