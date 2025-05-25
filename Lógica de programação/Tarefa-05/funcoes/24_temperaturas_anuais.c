#include <stdio.h>
#include <float.h> 

const char* nome_do_mes(int mes_num) {
    const char* nomes[] = {"", "Janeiro", "Fevereiro", "Marco", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"};
    if (mes_num >= 1 && mes_num <= 12) return nomes[mes_num];
    return "Invalido";
}

void ler_temperaturas_mensais(double temperaturas[]) {
    for (int i = 0; i < 12; i++) {
        scanf("%lf", &temperaturas[i]);
    }
}

void mostrar_maior_temperatura_e_mes(double temperaturas[]) {
    double maior_temp = -DBL_MAX;
    int mes_maior_temp = 0;
    for (int i = 0; i < 12; i++) {
        if (temperaturas[i] > maior_temp) {
            maior_temp = temperaturas[i];
            mes_maior_temp = i + 1;
        }
    }
    printf("Maior temperatura: %.2f em %s\n", maior_temp, nome_do_mes(mes_maior_temp));
}

void mostrar_menor_temperatura_e_mes(double temperaturas[]) {
    double menor_temp = DBL_MAX;
    int mes_menor_temp = 0;
    for (int i = 0; i < 12; i++) {
        if (temperaturas[i] < menor_temp) {
            menor_temp = temperaturas[i];
            mes_menor_temp = i + 1;
        }
    }
    printf("Menor temperatura: %.2f em %s\n", menor_temp, nome_do_mes(mes_menor_temp));
}

int main() {
    double temperaturas[12];
    ler_temperaturas_mensais(temperaturas);
    mostrar_maior_temperatura_e_mes(temperaturas);
    mostrar_menor_temperatura_e_mes(temperaturas);
    return 0;
}
