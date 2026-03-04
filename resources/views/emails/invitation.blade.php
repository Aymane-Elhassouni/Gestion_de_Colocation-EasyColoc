<!DOCTYPE html>
<html>
<body style="background-color: #f3f4f6; padding: 40px 0; font-family: sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
            <td align="center">
                <table width="600" border="0" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 12px; padding: 40px; text-align: center; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                    <tr>
                        <td>
                            <h1 style="color: #1f2937; font-size: 24px; font-weight: bold; margin-bottom: 16px;">Salut !</h1>
                            
                            <p style="color: #4b5563; font-size: 16px; margin-bottom: 24px;">
                                L'administrateur de la colocation <strong>{{ $colocName }}</strong> 
                                vous invite à rejoindre leur groupe sur <strong>ColocManager</strong>.
                            </p>

                            <div style="background-color: #f9fafb; padding: 24px; border-radius: 8px; display: inline-block; margin-bottom: 24px; border: 1px solid #e5e7eb;">
                                <p style="font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 1px; margin: 0 0 8px 0;">Votre Code d'Invitation</p>
                                <h2 style="font-size: 36px; font-family: monospace; font-weight: bold; color: #4f46e5; margin: 0;">
                                    {{ $token }}
                                </h2>
                            </div>

                            <p style="font-size: 14px; color: #6b7280; margin-bottom: 32px;">
                                Veuillez utiliser ce code de 6 chiffres lors de votre inscription pour rejoindre la colocation.
                            </p>

                            <a href="{{ url('/register') }}" style="background-color: #4f46e5; color: #ffffff; padding: 12px 24px; border-radius: 6px; text-decoration: none; font-weight: bold; display: inline-block;">
                                S'inscrire maintenant
                            </a>
                        </td>
                    </tr>
                </table>
                
                <p style="color: #9ca3af; font-size: 12px; margin-top: 24px;">
                    &copy; 2026 ColocManager. Tous droits réservés.
                </p>
            </td>
        </tr>
    </table>
</body>
</html>