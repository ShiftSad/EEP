#include <stdio.h>

double calcular_valor_da_sequencia_s(int n_termos) {
    double s = 0.0;
    if (n_termos >= 1) {
        for (int i = 1; i <= n_termos; i++) {
            s += 1.0 / i;
        }
    }
    return s;
}

int main() {
    int n_val;
    scanf("%d", &n_val);
    printf("%.2f\n", calcular_valor_da_sequencia_s(n_val));
    return 0;
}
