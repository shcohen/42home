/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   main.c                                             :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: shcohen <shcohen@student.42.fr>            +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/01/05 20:23:12 by shcohen           #+#    #+#             */
/*   Updated: 2019/01/06 14:31:30 by shcohen          ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "../includes/fractol.h"

void	ft_init_keycode(t_all *all)
{
	all->fra.mx = 0;
	all->fra.my = 0;
	all->key.zoom = 200;
	all->key.color_bonus = 0;
	all->key.px = 0;
	all->key.py = 0;
}

int		ft_usage(void)
{
	ft_putendl("usage : ./fractol <fractal name>\
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
		if (ft_check_fractals(argv[1], all) == -1)
		{
			ft_putendl("wrong fractal name : please refer to usage.");
			return (0);
		}
		ft_create_window(all);
		ft_init_keycode(all);
		ft_init_fractal(all);
		ft_choose_fractal(all);
		mlx_put_image_to_window(all->mlx.mlx_ptr, all->mlx.win_ptr,
				all->mlx.img_ptr, 0, 0);
		ft_array(all);
		mlx_hook(all->mlx.win_ptr, 17, 0, ft_exit, 0);
		mlx_loop(all->mlx.mlx_ptr);
	}
	return (0);
}
