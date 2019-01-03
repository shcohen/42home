/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2018/12/21 19:10:38 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/04 00:09:03 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

int		ft_usage(void)
{
	ft_putendl("\
usage : ./fractol <fractal name>\
\navailable : mandelbrot, julia, burningship.");
	return (0);
}

int		ft_exit(void)
{
	exit(0);
}

int		main(int argc, char **argv)
{
	t_all	*all;

	if (argc != 2)
		return (ft_usage());
	else if (argc == 2)
	{
		if (!(all = malloc(sizeof(t_all))))
				return (-1);
		if (ft_check_fractal(argv[1], all) == -1)
		{
			ft_putendl("wrong fractal name : please refer to usage.");
			return (0);
		}
		ft_create_window(all);
		ft_array(all);
		// mlx_hook(all->mlx.mlx_ptr, 2, (1L << 0), &ft_key, all);
		// mlx_hook(all->mlx.win_ptr, 17, 0, ft_exit, 0);
		mlx_loop(all->mlx.mlx_ptr);
	}
	return (0);
}