/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/11/27 13:24:39 by shcohen           #+#    #+#             */
/*   Updated: 2018/12/18 12:06:57 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fdf.h"

int		main(int argc, char **argv)
{
	t_all	*all;

	if (!(all = (t_all *)ft_memalloc(sizeof(t_all))))
		return (-1);
	if (argc == 2)
	{
		if (!ft_parse_map(argv[1], all))
			return (-1);
		ft_create_window(all);
		mlx_hook(all->win.win_ptr, 2, (1L << 0), &ft_key, all);
		ft_array(all);
		mlx_loop(all->win.mlx_ptr);
	}
	else
		ft_putstr("usage : only two arguments authorized.");
	return (0);
}

//  Réduire limite zoom maximum
// Ne pas faire bresenham quand les 2 points sont en dehors de l'écran
// (+ point central pour assurer)
// Limite zoom minimum ?
// Reset en fonction de la projection
