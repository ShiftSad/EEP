#include <stdio.h>

void ler_matriz_real(double matriz[10][5]) {
    for (int i = 0; i < 10; i++) {
        for (int j = 0; j < 5; j++) {
            scanf("%lf", &matriz[i][j]);
        }
    }
}

double somar_elementos_abaixo_sexta_linha(double matriz[10][5]) {
    double soma = 0.0;
    for (int i = 5; i < 10; i++) { 
        for (int j = 0; j < 5; j++) {
            soma += matriz[i][j];
        }
    }
    return soma;
}

int main() {
    double matriz[10][5];
    ler_matriz_real(matriz);
    double soma_total = somar_elementos_abaixo_sexta_linha(matriz);
    printf("%.2f\n", soma_total);
    return 0;
}
