#include <stdio.h>
#define TAM_VETOR_20 20

double somar_elementos_vetor(double x[]) {
    double soma = 0.0;
    for (int i = 0; i < TAM_VETOR_20; i++) {
        soma += x[i];
    }
    return soma;
}

int main() {
    double x[TAM_VETOR_20];
    for (int i = 0; i < TAM_VETOR_20; i++) scanf("%lf", &x[i]);
    double resultado_soma = somar_elementos_vetor(x);
    printf("%.2f\n", resultado_soma);
    return 0;
}
