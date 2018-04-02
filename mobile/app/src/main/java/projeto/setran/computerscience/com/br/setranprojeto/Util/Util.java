package projeto.setran.computerscience.com.br.setranprojeto.Util;

import android.content.Context;
import android.content.SharedPreferences;
import android.content.res.Resources;
import android.preference.PreferenceManager;
import android.util.TypedValue;
import java.util.InputMismatchException;


/**
 * Created by marce on 14/02/2018.
 */

public class Util {





        public static boolean isCPF(String CPF) {
// considera-se erro CPF's formados por uma sequencia de numeros iguais
            if (CPF.equals("00000000000") || CPF.equals("11111111111") ||
                    CPF.equals("22222222222") || CPF.equals("33333333333") ||
                    CPF.equals("44444444444") || CPF.equals("55555555555") ||
                    CPF.equals("66666666666") || CPF.equals("77777777777") ||
                    CPF.equals("88888888888") || CPF.equals("99999999999") ||
                    (CPF.length() != 11))
                return(false);

            char dig10, dig11;
            int sm, i, r, num, peso;

// "try" - protege o codigo para eventuais erros de conversao de tipo (int)
            try {
// Calculo do 1o. Digito Verificador
                sm = 0;
                peso = 10;
                for (i=0; i<9; i++) {
// converte o i-esimo caractere do CPF em um numero:
// por exemplo, transforma o caractere '0' no inteiro 0
// (48 eh a posicao de '0' na tabela ASCII)
                    num = (int)(CPF.charAt(i) - 48);
                    sm = sm + (num * peso);
                    peso = peso - 1;
                }

                r = 11 - (sm % 11);
                if ((r == 10) || (r == 11))
                    dig10 = '0';
                else dig10 = (char)(r + 48); // converte no respectivo caractere numerico

// Calculo do 2o. Digito Verificador
                sm = 0;
                peso = 11;
                for(i=0; i<10; i++) {
                    num = (int)(CPF.charAt(i) - 48);
                    sm = sm + (num * peso);
                    peso = peso - 1;
                }

                r = 11 - (sm % 11);
                if ((r == 10) || (r == 11))
                    dig11 = '0';
                else dig11 = (char)(r + 48);

// Verifica se os digitos calculados conferem com os digitos informados.
                if ((dig10 == CPF.charAt(9)) && (dig11 == CPF.charAt(10)))
                    return(true);
                else return(false);
            } catch (InputMismatchException erro) {
                return(false);
            }
        }

    /**
     * Converting dp to pixel
     */
    public static int dpToPx(int dp, Resources r) {
        return Math.round(TypedValue.applyDimension(TypedValue.COMPLEX_UNIT_DIP, dp, r.getDisplayMetrics()));
    }

    public static void putPref(String key, String value, Context context) {
        SharedPreferences prefs = PreferenceManager.getDefaultSharedPreferences(context);
        SharedPreferences.Editor editor = prefs.edit();
        editor.putString(key, value);
        editor.commit();
    }

    public static String getPref(String key, Context context) {
        SharedPreferences preferences = PreferenceManager.getDefaultSharedPreferences(context);
        return preferences.getString(key, null);
    }

    public static String ltrim(String s) {
        int i = 0;
        while (i < s.length() && Character.isWhitespace(s.charAt(i))) {
            i++;
        }
        return s.substring(i);
    }

    public static String rtrim(String s) {
        int i = s.length()-1;
        while (i > 0 && Character.isWhitespace(s.charAt(i))) {
            i--;
        }
        return s.substring(0,i+1);
    }
}
