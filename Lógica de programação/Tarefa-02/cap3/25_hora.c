#include <stdio.h>

int main() {
    float hours, minutes;
    printf("Digite as horas: ");
    scanf("%f", &hours);
    printf("Digite os minutos: ");
    scanf("%f", &minutes);

    printf("Hora: %.2f\n", hours + minutes / 60);
    printf("Minutos: %.2f\n", hours * 60 + minutes);
    printf("Segundos: %.2f\n", hours * 3600 + minutes * 60);
}